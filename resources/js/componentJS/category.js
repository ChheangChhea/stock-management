import { $ref, ref, reactive, watch, computed, onMounted } from "vue";
import axios from "axios";
import readXlsxFile from "read-excel-file";
import * as XLSX from "xlsx/xlsx.mjs";
export default function useCategory() {
    const Categories = ref([])
    const search = ref('')
    const checkexcel = ref([])
    const exefile = ref('')
    const excel = ref('Import')
    const form = reactive({
        cat_code: "",
        cat_name: "",
        cat_name_2: "",
        inactived: "",
    })
    const CatExcels = reactive([{
        cat_name: "",
        cat_name_2: "",
        inactived: "",
    }])
    onMounted(() => {
        getCategory();
    });
    watch(search, () => {
        getCategory();
    });
    const getCategory = async (p = 1) => {
        axios.get("api/v1/category?page=" + p, { params: { search: search.value } }).then(({ data }) => {
            Categories.value = data;
        })
    }
    const createCategory = async (form) => {
        axios.post('api/v1/categorys/create', form)
    }
    const DeleteCategory = async (id) => {
        axios.post('api/v1/category/delete/' + id)
    }
    const updateCategory = async (x, form) => {
        axios.post('api/v1/categorys/updete/' + x, form)
    }
    const printCategory = async () => {
        var printContents = document.getElementById("categoryprint").outerHTML;
        document.body.innerHTML = printContents;
        window.print();
        window.location.reload();
    }
    const dataexcelCategory = async (event) => {
        exefile.value = "";
        const xlsxfile = event.target.files ? event.target.files[0] : null;
        readXlsxFile(xlsxfile).then((rows) => {
            var x = 0;
            rows.forEach((element) => {
                if (x >= 0) {
                    if (x == 0) {
                        checkexcel.value = element;
                        console.log(checkexcel.value);
                    } else {
                        if (
                            checkexcel.value[0] == "cat_name" &&
                            checkexcel.value[1] == "cat_name_2" &&
                            checkexcel.value[2] == "inactived"
                        ) {
                            console.log(element);
                            CatExcels.push({
                                cat_name: element[0],
                                cat_name_2: element[1],
                                inactived: element[2],
                            });
                            console.log(CatExcels)
                        } else {
                            exefile.value = " fail data ";
                        }
                    }
                }
                x++;
            });
        });
        exefile.value = "";
    }
    const savexcelCategoy = async () => {
        alert('file')
    }


    // getExcelData(event) {
    //     this.exefile = "";
    //     let xlsxfile = event.target.files ? event.target.files[0] : null;
    //     readXlsxFile(xlsxfile).then((rows) => {
    //       var x = 0;
    //       rows.forEach((element) => {
    //         if (x >= 0) {
    //           if (x == 0) {
    //             this.checkexcel = element;
    //           } else {
    //             if (
    //               this.checkexcel[0] == "id" &&
    //               this.checkexcel[1] == "product_no" &&
    //               this.checkexcel[2] == "description" &&
    //               this.checkexcel[3] == "unit_of_measure_code" &&
    //               this.checkexcel[4] == "inventory" &&
    //               this.checkexcel[5] == "unit_price" &&
    //               this.checkexcel[6] == "total_amount"
    //             ) {
    //               this.items.push({
    //                 id: x,
    //                 document_no: this.form.document_no,
    //                 document_type: this.form.document_type,
    //                 product_no: element[1],
    //                 description: element[2],
    //                 unit_of_measure_code: element[3],
    //                 inventory: element[4],
    //                 unit_price: element[5],
    //                 total_amount: element[6],
    //                 curency_code: this.form.curency_code,
    //               });
    //             } else {
    //               this.exefile = " fail data ";
    //             }
    //           }
    //         }
    //         x++;
    //         this.sumTotal(this.items);
    //       });
    //     });
    //     this.exefile = "";
    //   },


    // saveprulink() {
    //     if (this.items.length > 0) {
    //         setTimeout(() => this.savepru(), 500);
    //     }
    // },



    // savepru() {
    //     axios
    //         .post("/api/v1/purchase/PrulinkeSave/", this.items[this.checkarray])
    //         .then((response) => {
    //             this.massege =
    //                 this.items[this.checkarray - 1].product_no +
    //                 " / " +
    //                 this.items[this.checkarray - 1].description;
    //             this.massege +=
    //                 " : " +
    //                 this.items[this.checkarray].product_no +
    //                 " / " +
    //                 this.items[this.checkarray].description;
    //             this.massege +=
    //                 " : " +
    //                 this.items[this.checkarray + 1].product_no +
    //                 " / " +
    //                 this.items[this.checkarray + 1].description;
    //         });
    //     if (this.checkarray < this.items.length) {
    //         this.saveprulink();
    //         this.checkarray++;
    //         this.meassagechek("open");
    //     } else {
    //         this.meassagechek("close");
    //         this.checkarray = 0;
    //     }
    // },
    // exportSheet() {
    //   this.items = [];
    //   this.purchases_lines.forEach((element) => {
    //     console.log(element);
    //     this.items.push({
    //       id: element.id,
    //       document_no: element.document_no,
    //       document_type: element.document_type,
    //       product_no: element.product_no,
    //       description: element.description,
    //       unit_of_measure_code: element.unit_of_measure_code,
    //       inventory: element.inventory,
    //       unit_price: element.unit_price,
    //       total_amount: element.total_amount,
    //       curency_code: element.curency_code,
    //     });
    //   });
    //   this.excel = "Export";
    // },
    // exportdataExcel() {
    //   const invoices = this.items.reduce((ac, element) => {
    //     ac.push({
    //       document_no: element.document_no,
    //       document_type: element.document_type,
    //       product_no: element.product_no,
    //       description: element.description,
    //       unit_of_measure_code: element.unit_of_measure_code,
    //       inventory: element.inventory,
    //       unit_price: element.unit_price,
    //       total_amount: element.total_amount,
    //       curency_code: element.curency_code,
    //     });
    //     return ac;
    //   }, []);
    //   var invoicesWS = XLSX.utils.json_to_sheet(invoices);
    //   var wb = XLSX.utils.book_new();
    //   XLSX.utils.book_append_sheet(wb, invoicesWS, "PruchecLink");
    //   XLSX.writeFile(wb, "PruchecLink.xlsx");
    // },
    return {
        Categories,
        form,
        search,
        CatExcels,
        checkexcel,
        exefile,
        excel,
        getCategory,
        createCategory,
        DeleteCategory,
        updateCategory,
        printCategory,
        dataexcelCategory,
        savexcelCategoy,
    }
}