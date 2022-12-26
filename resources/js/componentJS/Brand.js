import { $ref, ref, reactive, watch, computed, onMounted } from "vue";
import axios from "axios";
export default function useBrand (){
    const items = ref ([])
    const search = ref ('')
    onMounted (()=>{
        getBrand()
    })
    watch(search,()=>{
        getBrand();
    })
const getBrand = async (p =1) =>{
    axios.get('api/v1/brands?page=' + p , {params:{search:search.value}}).then(({data})=> {
        items.value = data
    })
}
    return{
        items,
        search,
        getBrand,
    }
}
