import Swal from 'sweetalert2';

export default {
    data() {
        return {
            loading: true,
            form: {}
        }
    },
    methods: {
        deleteConfirm() {
            return new Promise(
                function (resolve, reject) {
                    Swal.fire({
                        title: 'آیا مطمین هستید؟',
                        //text: "You won't be able to revert this!",
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'خیر',
                        confirmButtonText: 'بله',
                        icon: 'warning',
                    }).then(confirm => {
                        if (confirm.value) {
                            resolve(confirm);
                        } else {
                        }
                    }).catch(error => {
                        reject(false);
                    });
                }
            );
        },
        operationConfirm() {
            return new Promise(
                function (resolve, reject) {
                    Swal.fire({
                        title: 'آیا مطمین هستید؟',
                        //text: "You won't be able to revert this!",
                        type: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'خیر',
                        confirmButtonText: 'بله!'
                    }).then(confirm => {
                        if (confirm.value) {
                            resolve(confirm);
                        } else {
                        }
                    }).catch(error => {
                        reject(false);
                    });
                }
            );
        },
        scrollToTop() {
            window.scroll({
                top: 0,
                left: 0,
                behavior: 'smooth'
            });
        },
        scrollToElement(selector) {
            $('html, body').animate({
                scrollTop: ($(`${selector}`).offset().top)
            }, 500);
        },
        emptyForm(){
            this.form={}
        }
    },

}