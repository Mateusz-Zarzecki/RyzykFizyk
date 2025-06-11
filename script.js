document.addEventListener("DOMContentLoaded", () => {
    const fade = document.querySelector(".fade-container");
    if (fade) {
        setTimeout(() => {
            fade.classList.add("fade-in");
        }, 50);
    }

    const form = document.querySelector("form");
    if (form && fade) {
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            fade.classList.remove("fade-in");
            fade.classList.add("fade-out");
            setTimeout(() => {
                form.submit();
            }, 500);
        });
    }
});
document.addEventListener("DOMContentLoaded", () => {
    const fade = document.querySelector(".fade-container");
    const form = document.querySelector("form");
    const answerTimeout = 30000;
    let timerId;

    if (fade) {
        setTimeout(() => {
            fade.classList.add("fade-in");
        }, 50);
    }

    if (form && fade) {
        const button = form.querySelector("button[type='submit']");
        const originalBtnText = button?.textContent || "Dalej";
        let timeLeft = answerTimeout / 1000;

        const updateButtonText = () => {
            if (button) {
                button.textContent = `${originalBtnText.split(' (')[0]} (${timeLeft}s)`;
            }
        };

        const intervalId = setInterval(() => {
            timeLeft--;
            updateButtonText();

            if (timeLeft <= 0) {
                clearInterval(intervalId);
                button.disabled = true;
                fade.classList.remove("fade-in");
                fade.classList.add("fade-out");
                setTimeout(() => form.submit(), 500);
            }
        }, 1000);

        updateButtonText();

        form.addEventListener("submit", (e) => {
            e.preventDefault();
            clearInterval(intervalId);
            fade.classList.remove("fade-in");
            fade.classList.add("fade-out");
            setTimeout(() => form.submit(), 500);
        });
    }
});


