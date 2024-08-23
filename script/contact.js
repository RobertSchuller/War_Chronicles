document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('contact_form');

    form.addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission

        const formData = new FormData(form);

        fetch('contact.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById('container').innerHTML = data;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});
