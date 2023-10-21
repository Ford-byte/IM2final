document.querySelector("#TeacherLogin").addEventListener("submit", () => {
    Swal.fire({
        title: 'DONE!',
        text: 'Assignment submitted successfully!',
        icon: 'success',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'studentList.php';
        }
    });
});

document.querySelector("#editstudentModalForm").addEventListener("submit", (e) => {
    e.preventDefault();
    Swal.fire({
        title: 'DONE!',
        text: 'Assignment submitted successfully!',
        icon: 'success',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'studentList.php';
        }
    });

});

