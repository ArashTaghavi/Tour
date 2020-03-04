<template>
    <card :title="`${$route.name}`">
        <div class="table-responsive" v-if="contacts.length">
            <div id="table-1_wrapper" class="container-fluid dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>نام</th>
                                <th>ایمیل</th>
                                <th>متن</th>
                                <th>تاریخ</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(contact,key) in contacts" :key=key>
                                <td>{{contact.full_name}}</td>
                                <td>{{contact.email}}</td>
                                <td>{{contact.description}}</td>
                                <td>{{jDate(contact.created_at)}}</td>
                                <td>
                                    <delete-btn :id="contact.id"/>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <not-found v-else/>
    </card>
</template>


<script>
    export default {
        data() {
            return {
                contacts: []
            }
        },
        created() {
            this.getContacts();
        },
        methods: {
            getContacts() {
                axios.get('/contacts')
                    .then(response => this.contacts = response.data)
                    .catch(error => this.errorNotify(error));
            },
            handleDelete(id) {
                axios.delete(`/contacts/${id}`)
                    .then(response => {
                        this.successNotify(response);
                        this.getContacts();
                    })
                    .catch(error => this.errorNotify(error));
            },
            jDate(date) {
                return moment(date).format('jYYYY/jM/jD HH:mm:ss');
            },
        }
    }
</script>
