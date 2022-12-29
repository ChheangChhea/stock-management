import { ref, reactive, watch, computed, onMounted } from "vue";
import axios from "axios";
import readXlsxFile from "read-excel-file";
import * as XLSX from "xlsx/xlsx.mjs";
export default function useBrand() {
    const items = ref([])
    const search = ref('')
    const checkexcel = ref([])
    const exefile = ref('')
    const excel = ref('Import')
    const form = reactive({
        id: "",
        brand_code: "",
        brand_name: "",
        brand_name_2: "",
        inactived: "Yes",
    })
    const BraExcels = reactive([{
        brand_code: "",
        brand_name: "",
        brand_name_2: "",
        inactived: "",
    }])
    onMounted(() => {
        getBrand();
    })
    watch(search, () => {
        getBrand();
    })
    const getBrand = async (p = 1) => {
        axios.get('api/v1/brands?page=' + p, { params: { search: search.value } }).then(({ data }) => {
            items.value = data
        })
    }
    const saveBrand = async (form) => {
        axios.post('api/v1/brands/create/', form)
    }
    const deleteBrand = async (id) => {
        axios.post('api/v1/brands/delete/' + id)
    }
    const updateBrand = async (x, form) => {
        axios.post('api/v1/brands/update/' + x, form)
    }
    const printBrand = async () => {
        var printContents = document.getElementById("excelBrand").outerHTML;
        document.body.innerHTML = printContents;
        window.print();
        window.location.reload();
    }
    const dataexcelBrand = async (event) => {
        exefile.value = "";
        const xlsxfile = event.target.files ? event.target.files[0] : null;
        readXlsxFile(xlsxfile).then((rows) => {
            var x = 0;
            rows.forEach((element) => {
                console.log(element);
                if (x >= 0) {
                    if (x == 0) {
                        checkexcel.value = element;
                    } else {
                        if (
                            checkexcel.value[0] == "brand_code" &&
                            checkexcel.value[1] == "brand_name" &&
                            checkexcel.value[2] == "brand_name_2" &&
                            checkexcel.value[3] == "inactived"
                        ) {

                            BraExcels.push({
                                brand_code: element[0],
                                brand_name: element[1],
                                brand_name_2: element[2],
                                inactived: element[3],
                            });
                            console.log(BraExcels);
                        } else {
                            exefile.value = " Fail Data";
                        }
                    }
                }
                x++;
            });
        });
        exefile.value = "";
    }
    return {
        items,
        search,
        form,
        checkexcel,
        exefile,
        excel,
        getBrand,
        deleteBrand,
        saveBrand,
        updateBrand,
        printBrand,
        dataexcelBrand
    }
}
