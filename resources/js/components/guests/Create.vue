<template>
    <div>
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Add new guestbook</h6>
                </div>
                <div class="card-body">
                    <form @submit.prevent="storeGuest">
                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>

                            <div class="col-md-6">
                                <input id="first_name" v-model="guest.first_name" type="text" v-bind:class="{ 'is-invalid': errors.first_name }" class="form-control" name="first_name" value="" required autocomplete="first_name" autofocus>
                                <ul v-if="errors.first_name" class="mt-2">
                                    <li v-for="error in errors.first_name" :key="error.first_name" class="text-danger list-unstyled">
                                        {{ error }}
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>

                            <div class="col-md-6">
                                <input id="last_name" v-model="guest.last_name" type="text" class="form-control" name="last_name" value="" required autocomplete="last_name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="organization" class="col-md-4 col-form-label text-md-right">Organization</label>

                            <div class="col-md-6">
                                <input id="organization" v-model="guest.organization" type="text" class="form-control" name="organization" value="" required autocomplete="organization" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <input id="address" v-model="guest.address" type="text" class="form-control" name="address" value="" required autocomplete="address" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="province_code" class="col-md-4 col-form-label text-md-right">Province</label>

                            <div class="col-md-6">
                                <select v-model="guest.province_code" @change='getCities()' name="province_code" class="form-control">
                                    <option v-for="province in provinces" :key="province.code" :value="province.code">
                                        {{ province.name }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city_code" class="col-md-4 col-form-label text-md-right">City</label>

                            <div class="col-md-6">
                                <select v-model="guest.city_code" name="city_code" class="form-control">
                                    <option v-for="city in cities" :key="city.code" :value="city.code">
                                        {{ city.name }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
                                </button>
                                <router-link :to="{name: 'GuestbookIndex'}" class="btn btn-secondary">Back</router-link>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            guest: {},
            provinces: [],
            cities: [],
            errors: []
        };
    },
    created() {
        this.getProvinces();
        this.getCities();
    },
    methods: {
        getProvinces(){
            axios.get('/api/provinces')
                .then(res => {
                    this.provinces = res.data
                }).catch(error => {
                    console.log(console.error)
                });
        },
        getCities(){
            axios.get('/api/cities/' + this.guest.province_code)
                .then(res => {
                    this.cities = res.data
                }).catch(error => {
                    console.log(console.error)
                });
        },
        storeGuest() {
            axios.post("/api/guests", this.guest)
                .then(res => {
                    Swal.fire({
                        title: 'Success!',
                        text: res.data.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    })
                    this.$router.push({ name: "GuestbookIndex" });
                })
                .catch(err => this.errors = err.response.data.errors)
                .finally(() => this.loading = false);
        }
    }
}
</script>