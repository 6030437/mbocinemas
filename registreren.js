const passwordInput = document.getElementById("password");
        const lengthReq = document.getElementById("length");
        const uppercaseReq = document.getElementById("uppercase");
        const lowercaseReq = document.getElementById("lowercase");
        const numberReq = document.getElementById("number");
        const specialReq = document.getElementById("special");

        passwordInput.addEventListener("input", () => {
            const password = passwordInput.value;

            // Check lengte
            if (password.length >= 8) {
                lengthReq.classList.add("valid");
                lengthReq.classList.remove("invalid");
            } else {
                lengthReq.classList.add("invalid");
                lengthReq.classList.remove("valid");
            }

            // Check hoofdletter
            if (/[A-Z]/.test(password)) {
                uppercaseReq.classList.add("valid");
                uppercaseReq.classList.remove("invalid");
            } else {
                uppercaseReq.classList.add("invalid");
                uppercaseReq.classList.remove("valid");
            }

            // Check kleine letter
            if (/[a-z]/.test(password)) {
                lowercaseReq.classList.add("valid");
                lowercaseReq.classList.remove("invalid");
            } else {
                lowercaseReq.classList.add("invalid");
                lowercaseReq.classList.remove("valid");
            }

            // Check cijfer
            if (/[0-9]/.test(password)) {
                numberReq.classList.add("valid");
                numberReq.classList.remove("invalid");
            } else {
                numberReq.classList.add("invalid");
                numberReq.classList.remove("valid");
            }

            // Check speciaal teken
            if (/[@#$%^&*(),.?":{}|<>]/.test(password)) {
                specialReq.classList.add("valid");
                specialReq.classList.remove("invalid");
            } else {
                specialReq.classList.add("invalid");
                specialReq.classList.remove("valid");
            }
        });