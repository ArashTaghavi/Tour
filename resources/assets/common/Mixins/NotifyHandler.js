import Swal from 'sweetalert2/dist/sweetalert2.all.min';

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer);
        toast.addEventListener('mouseleave', Swal.resumeTimer);
    }
});
export default {
    methods: {
        successNotify(message) {
            Toast.fire({
                title: message.data.message,
                icon: 'success',
            });
        },
        errorNotify(error) {
            console.log(error);
            Toast.fire({
                title: error.response.data.message,
                icon: 'error',
            });
        },
    }
}
