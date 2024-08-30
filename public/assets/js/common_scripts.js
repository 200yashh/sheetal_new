var deleteAlert = {
    text: "Are you sure you want to delete this record?",
    icon: "warning",
    showCancelButton: true,
    buttonsStyling: false,
    confirmButtonText: "Yes, delete!",
    cancelButtonText: "No, cancel",
    customClass: {
        confirmButton: "btn font-weight-bold btn-outline-danger",
        cancelButton: "btn font-weight-bold btn-default"
    }
};
var deleteSuccessAlert = {
    text: "Record deleted successfully!",
    icon: "success",
    showCancelButton: false
};

var restoreAlert = {
    text: "Are you sure you want to restore this user?",
    icon: "warning",
    showCancelButton: true,
    buttonsStyling: false,
    confirmButtonText: "Yes, restore!",
    cancelButtonText: "No, cancel",
    customClass: {
        confirmButton: "btn font-weight-bold btn-outline-danger",
        cancelButton: "btn font-weight-bold btn-default"
    }
};
var restoreSuccessAlert = {
    text: "User restored successfully!",
    icon: "success",
    showCancelButton: false
};

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

const ToastAlert = {
    icon: 'success',
    title: 'Signed in successfully'
};

$(document).ready(function () {
    $('.required').each(function () {
        var label = $(this).prev('label');
        label.append('<span class="text-danger font-initial">*</span>');
    });
})
