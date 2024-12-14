document.getElementById("registration-form").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent form submission

    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const phone = document.getElementById("phone").value.trim();
    const password = document.getElementById("password").value.trim();
    const messageDiv = document.getElementById("message");

    // Validate inputs
    if (!name || !email || !phone || !password) {
        messageDiv.textContent = "All fields are required!";
        return;
    }

    if (!/^\d{10}$/.test(phone)) {
        messageDiv.textContent = "Phone number must be 10 digits!";
        return;
    }

    messageDiv.textContent = "Form submitted successfully!";
    messageDiv.style.color = "green";

    // Reset form
    this.reset();
});
