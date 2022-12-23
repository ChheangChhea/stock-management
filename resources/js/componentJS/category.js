import { ref, reactive, watch, computed, onMounted } from "vue";
import axios from "axios";
export default function useCategory() {
    const Categories = ref([])
    const search = ref('')
    const form = reactive({
        cat_code: "",
        cat_name: "",
        cat_name_2: "",
        inactived: "",
    })
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
    return {
        Categories,
        form,
        search,
        getCategory,
        createCategory,
        DeleteCategory,
        updateCategory,
    }
}