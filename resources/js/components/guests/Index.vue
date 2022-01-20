<template>
    <div>
        <div class="col-xl-12 col-lg-12">
            <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert" v-if="showMessage">
                {{ message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> -->

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Guestbook list</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <router-link :to="{name: 'GuestbookCreate'}" class="btn btn-primary">Add new guestbook</router-link><br><br>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr align="center">
                                <th width="5%">No</th>
                                <th>#</th>
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
                                <td align="center">
                                    <router-link :to="{name: 'GuestbookEdit', params: {id: guest.id}}" class="btn btn-sm btn-info"><i class="fas fa-pen"></i></router-link>                       
                                    <button class="btn btn-sm btn-danger" @click="deleteGuest(guest.id)"><i class="fas fa-trash"></i></button>
                                </td>
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
        },
        deleteGuest(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete("api/guests/" + id).then(res => {
                        Swal.fire(
                            'Deleted!',
                            res.data.message,
                            'success'
                        )
                        this.getGuests();
                    });
                }
            })
        }
    }
}
</script>