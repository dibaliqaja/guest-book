<template>
    <div>
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Guestbook list</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <router-link :to="{name: 'GuestbookFrontCreate'}" class="btn btn-primary">Add new guestbook</router-link><br><br>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr align="center">
                                <th width="5%">No</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Organization</th>
                                <th>Address</th>
                                <th>Province</th>
                                <th>City</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(guest, index) in guests" :key="guest.id">
                                <td>{{ index+1 }}</td>
                                <td>{{ guest.first_name }}</td>
                                <td>{{ guest.last_name }}</td>
                                <td>{{ guest.organization }}</td>
                                <td>{{ guest.address }}</td>
                                <td>{{ guest.provinces.name }}</td>
                                <td>{{ guest.cities.name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            guests: [],
        }
    },
    created() {
        this.getGuests()
    },
    methods: {
        getGuests(){
            axios.get('/api/guests')
                .then(res => {
                    this.guests = res.data.data
                }).catch(error => {
                    console.log(error)
                })
        }
    }
}
</script>