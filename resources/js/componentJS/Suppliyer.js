import { ref, reactive, watch, computed, onMounted } from "vue";
import axios from "axios";
// import readXlsxFile from "read-excel-file";
// import * as XLSX from "xlsx/xlsx.mjs";
export default function useSuppliyer() {
    const suppliyers = ref([]);
    const search = ref('');
    const photo_path = ref('')
    const form = reactive({
        id: "",
        sup_code: "",
        sup_name: "",
        sup_name_2: "",
        image_url: "",
        address: "",
        phone_no: "",
        phone_no_2: "",
        fax_no: "",
        email: "",
        contact_name: "",
        contact_phone: "",
        status: "",
        inactived: "Yes",
    })
    onMounted(() => {
        getSuppliyer();
    })
    watch(search, () => {
        getSuppliyer();
    })
    const getSuppliyer = async (p = 1) => {
        axios.get('api/v1/suppliyers?page=' + p, { params: { search: search.value } }).then(({ data }) => {
            suppliyers.value = data
        })
    }
    const saveSup = async (form) => {
        axios.post('api/v1/suppliyers/store/', form)
    }
    const updateSup = async (sup, form) => {
        axios.post('api/v1/suppliyers/update/' + sup, form)
    }
    const supImage = async (e) => {
        const image = e.target.files[0];
        const reader = new FileReader();
        reader.readAsDataURL(image);
        reader.onload = (e) => {
            (photo_path.value = ""), (form.image_url = e.target.result);
        };
    }
    const deleteSup = async (id) => {
        axios.post("api/v1/suppliyers/delete/" + id)
    }
    return {
        form,
        suppliyers,
        search,
        getSuppliyer,
        saveSup,
        updateSup,
        supImage,
        photo_path,
        deleteSup,
    }
}