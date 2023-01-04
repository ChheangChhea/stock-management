<template>
  <div class="wrapper">
    <Header />
    <div class="search-box">
      <div id="product">
        <div class="box">
          <div class="box-content">
            <table
              width="100%"
              border="0"
              cellpadding="0"
              cellspacing="0"
              class="tbl_list tbl_stripe"
            >
              <thead>
                <tr>
                  <th width="5%">Image</th>
                  <th width="7%">Suppliyer Code</th>
                  <th width="7%">Suppliyer Name</th>
                  <th width="10%">Addresss</th>
                  <th width="8%">Phone Number</th>
                  <th width="8%">Fax Number</th>
                  <th width="12%">Email</th>
                  <th width="8%">Contact Name</th>
                  <th width="8%">Contact Phone</th>
                  <th width="8%">Inactived</th>

                  <th width="8%">
                    <div class="button" id="uniform-undefined">
                      <span
                        >Add New<input
                          type="button"
                          @click="btnAdd"
                          data-bs-toggle="modal"
                          data-bs-target="#staticBackdrop"
                          tabindex="10028"
                          style="opacity: 0; width: 76px"
                      /></span>
                    </div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(suppliyer, index) in suppliyers.data" :key="index">
                  <td width="5%">
                    <img
                      class="direct-chat-img"
                      :src="'img/suppliyer/' + suppliyer.image_url"
                    />
                  </td>
                  <td width="7%">{{ suppliyer.sup_code }}</td>
                  <td width="7%">{{ suppliyer.sup_name }}</td>
                  <td width="12%">{{ suppliyer.address }}</td>
                  <td width="7%">{{ suppliyer.phone_no }}</td>
                  <td width="6%">{{ suppliyer.fax_no }}</td>
                  <td width="12%">{{ suppliyer.email }}</td>
                  <td width="6%">{{ suppliyer.contact_name }}</td>
                  <td width="6%">{{ suppliyer.contact_phone }}</td>
                  <td width="6%">{{ suppliyer.inactived }}</td>
                  <td width="11%">
                    <div class="button" id="uniform-undefined">
                      <span
                        >Edit<input
                          type="button"
                          data-bs-toggle="modal"
                          data-bs-target="#staticBackdrop"
                          @click="btnEdit(suppliyer)"
                          tabindex="10028"
                          style="opacity: 0; width: 40px"
                      /></span>
                    </div>
                    <div class="button" id="uniform-undefined">
                      <span
                        >Delete<input
                          type="button"
                          @click="btnDelete(suppliyer.sup_code)"
                          tabindex="10028"
                          style="opacity: 0; width: 40px"
                      /></span>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="box-footer-pagination">
            <pagination
              :data="suppliyers"
              @pagination-change-page="getSuppliyer"
            />
          </div>
        </div>
      </div>
    </div>

    <div class="search-box-content">
      <div
        class="modal fade"
        id="staticBackdrop"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog smallpopup">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Suppliyer</h5>
              <span
                class="ui-icon ui-icon-closethick"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></span>
            </div>
            <div style="margin: 0; padding: 10px; display: inline">
              <table
                width="100%"
                border="0"
                cellpadding="0"
                cellspacing="0"
                class="tbl_search"
              >
                <tbody>
                  <tr>
                    <th>Suppliyer Code</th>
                    <td>
                      <input
                        :disabled="disabled"
                        name="supplier_code"
                        type="text"
                        class="text"
                        v-model="form.sup_code"
                        tabindex="10029"
                      />
                    </td>
                  </tr>
                  <tr>
                    <th>Suppliyer Name</th>
                    <td>
                      <input
                        name="supplier_name"
                        type="text"
                        class="text"
                        v-model="form.sup_name"
                        tabindex="10029"
                      />
                    </td>
                  </tr>
                  <tr>
                    <th>Suppliyer Name 2</th>
                    <td>
                      <input
                        name="supplier_name_2"
                        type="text"
                        class="text"
                        v-model="form.sup_name_2"
                        tabindex="10029"
                      />
                    </td>
                  </tr>
                  <tr>
                    <th>Image</th>
                    <td>
                      <input
                        type="file"
                        id="myfile"
                        name="myfile"
                        @change="imgUplaod($event)"
                      />
                    </td>
                  </tr>
                  <tr>
                    <th>Addresss</th>
                    <td>
                      <input
                        name="address"
                        type="text"
                        class="text"
                        v-model="form.address"
                        tabindex="10029"
                      />
                    </td>
                  </tr>
                  <tr>
                    <th>Phone Number</th>
                    <td>
                      <input
                        name="phone_num"
                        type="number"
                        class="text"
                        v-model="form.phone_no"
                        tabindex="10029"
                      />
                    </td>
                  </tr>
                  <tr>
                    <th>Phone Number 2</th>
                    <td>
                      <input
                        name="phone_num2"
                        type="number"
                        class="text"
                        v-model="form.phone_no_2"
                        tabindex="10029"
                      />
                    </td>
                  </tr>
                  <tr>
                    <th>Fax Number</th>
                    <td>
                      <input
                        name="fax_num"
                        type="text"
                        class="text"
                        v-model="form.fax_no"
                        tabindex="10029"
                      />
                    </td>
                  </tr>

                  <tr>
                    <th>Email</th>
                    <td>
                      <input
                        name="email"
                        type="email"
                        class="text"
                        v-model="form.email"
                        tabindex="10029"
                      />
                    </td>
                  </tr>
                  <tr>
                    <th>Contact Name</th>
                    <td>
                      <input
                        name="contact_name"
                        type="text"
                        class="text"
                        v-model="form.contact_name"
                        tabindex="10029"
                      />
                    </td>
                  </tr>
                  <tr>
                    <th>Contact Phone</th>
                    <td>
                      <input
                        name="contact_phone"
                        type="number"
                        class="text"
                        v-model="form.contact_phone"
                        tabindex="10029"
                      />
                    </td>
                  </tr>
                  <tr>
                    <th>status</th>
                    <td>
                      <input
                        name="status"
                        type="text"
                        class="text"
                        v-model="form.status"
                        tabindex="10029"
                      />
                    </td>
                  </tr>
                  <tr>
                    <th width="30%">Inactived</th>
                    <td width="70%">
                      <div class="selector" id="inactivced">
                        <span>{{ form.inactived }}</span>
                        <select
                          id="inactivced"
                          name="inactivced"
                          v-model="form.inactived"
                          tabindex="10003"
                          style="min-width: 51px; opacity: 0; width: 80px"
                        >
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="modal-footer">
              <div
                v-show="btnValue1"
                @click="btnSave"
                data-bs-dismiss="modal"
                aria-label="Close"
                class="button type2"
                id="uniform-undefined"
              >
                <span> Save</span>
                <input
                  type="button"
                  class="type2"
                  style="opacity: 0; width: 63px"
                  tabindex="10026"
                />
              </div>
              <div
                v-show="btnValue2"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="btnUpdate(form.sup_code)"
                class="button type2"
                id="uniform-undefined"
              >
                <span> Update</span>
                <input
                  type="button"
                  class="type2"
                  style="opacity: 0; width: 63px"
                  tabindex="10026"
                />
              </div>
              <div class="button type2" id="uniform-undefined">
                <span>Close</span>
                <input
                  type="button"
                  value="clear"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                  class="type2"
                  style="opacity: 0; width: 63px"
                  tabindex="10026"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
    
    <script setup>
import Header from "../Header.vue";
import pagination from "laravel-vue-pagination";
import useSuppliyer from "../../componentJS/Suppliyer";
import { ref } from "vue";
const disabled = ref(true);
const btnValue1 = ref(false);
const btnValue2 = ref(false);
const {
  deleteSup,
  supImage,
  updateSup,
  saveSup,
  getSuppliyer,
  suppliyers,
  form,
  search,
  photo_path,
} = useSuppliyer();
const btnAdd = async () => {
  form.sup_code = "";
  form.sup_name = "";
  form.sup_name_2 = "";
  form.image_url = "";
  form.address = "";
  form.phone_no = "";
  form.phone_no_2 = "";
  form.fax_no = "";
  form.email = "";
  form.contact_name = "";
  form.contact_phone = "";
  form.status = "";
  form.inactived = "Yes";
  disabled.value = false;
  btnValue1.value = true;
  btnValue2.value = false;
};
const btnEdit = async (sup) => {
  form.sup_code = sup.sup_code;
  form.sup_name = sup.sup_name;
  // form.sup_name_2 = sup.sup_name_2;
  form.image_url = sup.image_url;
  form.address = sup.address;
  form.phone_no = sup.phone_no;
  // form.phone_no_2 = sup.phone_no_2;
  form.fax_no = sup.fax_no;
  form.email = sup.email;
  form.contact_name = sup.contact_name;
  form.contact_phone = sup.contact_phone;
  // form.status = sup.status;
  form.inactived = sup.inactived;
  disabled.value = true;
  btnValue2.value = true;
  btnValue1.value = false;
  console.log(form.image_url);
};
const btnSave = async () => {
  saveSup(form);
  getSuppliyer();
};
const btnUpdate = async (sup, form) => {
  updateSup(sup, form);
  getSuppliyer();
};
const imgUplaod = async (e) => {
  supImage(e);
};
const btnDelete = async (id) => {
  deleteSup(id);
  getSuppliyer();
};
//       forms: {
//         id: "",
//         sup_code: "",
//         sup_name: "",
//         sup_name_2: "",
//         image_url: "",
//         address: "",
//         phone_no: "",
//         phone_no_2: "",
//         fax_no: "",
//         email: "",
//         contact_name: "",
//         contact_phone: "",
//         status: "",
//         inactived: "",
//       },
//     };
//   },

//   mounted() {
//     this.getSuppliyer();
//   },

//   methods: {
//     getSuppliyer(page = 1) {
//       //   axios.get("api/v1/suppliyers").then((res) => {
//       //     this.suppliyers = res;
//       //   });
//       if (page > 0 && page <= this.last_page) {
//         axios
//           .get("api/v1/suppliyers")
//           .then(({ data }) => {
//             this.links = data.links;
//             this.last_page = data.last_page;
//             this.links.forEach((element) => {
//               if (element.label == page) {
//                 this.perPage = "api/v1/suppliyers?page=" + page;
//                 axios.get(this.perPage).then(({ data }) => {
//                   this.currentPage = data.current_page;
//                   this.suppliyers = data;
//                 });
//               }
//             });
//           })
//           .catch(({ response }) => {
//             console.error(response);
//           });
//       }
//     },
//     imgUplaod(event) {
//       const image = event.target.files[0];
//       const reader = new FileReader();
//       reader.readAsDataURL(image);
//       reader.onload = (event) => {
//         (this.photo_path = ""), (this.form.image_url = event.target.result);
//       };
//     },
//     choosePhoto() {
//       this.$refs.choose.click();
//     },
//     btnAdd() {
//       this.form = {};
//       this.routeSup = "api/v1/suppliyers/store/";
//       this.isdisabled = false;
//       this.add = 1;
//     },
//     btnClose() {
//       this.form = {};
//     },
//     btnSave() {
//       axios.post(this.routeSup, this.form).then((res) => {
//         this.getSuppliyer();
//         this.form = {};
//       });
//     },
//     btnEdit(suppliyer) {
//       this.isdisabled = true;
//       this.photo_path = "img/suppliyer/";
//       this.routeSup = "api/v1/suppliyers/update/";
//       this.form = JSON.parse(JSON.stringify(suppliyer));
//       this.add = 2;
//     },
//     btnUpdate(y) {
//       axios.post(this.routeSup + y, this.form).then((res) => {
//         this.getSuppliyer();
//         this.form = Object.assign({}, this.form);
//       });
//     },
//     btnDelete(x) {
//       console.log(x);
//       axios.post("api/v1/suppliyers/delete/" + x).then((res) => {
//         this.getSuppliyer();
//       });
//     },
//     print() {
//       var printContents = document.getElementById("invoiceholder").outerHTML;
//       document.body.innerHTML = printContents;
//       window.print();
//       window.location.reload();
//     },
//   },
// };
</script>
    