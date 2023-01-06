require('./bootstrap');
require('alpinejs');
import Alpine from 'alpinejs'
window.Alpine = Alpine
import { createApp } from 'vue'
import router from './router/router';
import { Form } from 'vform'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
window.Form = Form;
import axios from 'axios';
import App from './components/App.vue'
import Brands from './components/Brands/Brands.vue'
import Product from './components/Product/product.vue'
import Viewproduct from './components/Product/view-product.vue'
import Category from './components/Category/Category.vue'
import Supplies from './components/Supplies/Supplies.vue'
import Group from './components/Group/Product_group.vue'
import Serailcode from './components/Serailcode/serailcode.vue'
import Purchase from './components/Purchase/purchase-order.vue'
import Purchasview from './components/Purchase/view-puchese.vue'
import MenuProductSetting from './components/MenuProductsetup.vue'
import MenuPurchase from './components/MenuPurchase.vue'
import MenuStock from './components/MenuStock.vue'
import Stockalert from './components/StockAlert/stockalert.vue'
import MenuClinic from './components/MenuClinic.vue'
import MenuMedical from './components/MenuMedical.vue'
import Receptorder from './components/Recept/Recept-order.vue'
import viewRecept from './components/Recept/view-Recept.vue'
import unitcode from './components/unitcode/unitcode.vue'
import StockTransection from './components/StockTransection/stock-transection.vue'
import Currency from './components/Currency/currency.vue'
import ExchangeRate from './components/ExchangeRate/ExchangeRate.vue'
import StockCount from './components/StockCount/stock-count.vue'
import paymenMethod from './components/PaymentMethod/paymenMethod.vue'

const app = createApp({
  components: {
    App,
    Brands,
    Product,
    Viewproduct,
    Category,
    Supplies,
    Group,
    Serailcode,
    Purchase,
    Purchasview,
    MenuProductSetting,
    MenuPurchase,
    MenuStock,
    Stockalert,
    MenuClinic,
    MenuMedical,
    Receptorder,
    viewRecept,
    unitcode,
    StockTransection,
    Currency,
    ExchangeRate,
    StockCount,
    paymenMethod,
  }
})
Alpine.start()
app.use(router, axios, VueSweetalert2)
app.mount('#app')


