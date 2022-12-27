import { ref, reactive, watch, computed, onMounted } from "vue";
import axios from "axios";
import readXlsxFile from "read-excel-file";
import * as XLSX from "xlsx/xlsx.mjs";
export default function useCategory() {
    const Categories = ref([])
    const search = ref('')
    const checkexcel = ref([])
    const exefile = ref('')
    const checkarray = ref(1)
    const excel = ref('Import')
    const form = reactive({
        cat_code: "",
        cat_name: "",
        cat_name_2: "",
        inactived: "",
    })
    const CatExcels = reactive([{
        cat_code: "",
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
                    } else {
                        if (
                            checkexcel.value[0] == "cat_code" &&
                            checkexcel.value[1] == "cat_name" &&
                            checkexcel.value[2] == "cat_name_2" &&
                            checkexcel.value[3] == "inactived"
                        ) {

                            CatExcels.push({
                                cat_code: element[0],
                                cat_name: element[1],
                                cat_name_2: element[2],
                                inactived: element[3],
                            });
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
    const savexcelCategoy = async () => {
        saveimportExcel()
    }
    const saveimportExcel = async () => {
        var x = 0
        CatExcels.forEach(element => {
            if (x != 0) {
                axios.post('api/v1/category/excel', element).then(({ data }) => {
                    console.log(element);
                    CatExcels.values = data.data
                })
            }
            x++
        });
    }

    return {
        Categories,
        form,
        search,
        CatExcels,
        checkexcel,
        exefile,
        excel,
        checkarray,
        getCategory,
        createCategory,
        DeleteCategory,
        updateCategory,
        printCategory,
        dataexcelCategory,
        savexcelCategoy,
    }
}