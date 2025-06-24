function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add("hidden");
        modal.classList.remove("flex");
        document.body.style.overflow = ""; // Restore scrolling
    }
}

document.addEventListener("DOMContentLoaded", () => {
    const eventCards = document.querySelectorAll(".event-card");
    const modals = document.querySelectorAll(".modal");
    const closeButtons = document.querySelectorAll(".close-modal-btn");

    // Open modal and disable body scroll
    eventCards.forEach((card) => {
        card.addEventListener("click", () => {
            const modalId = card.getAttribute("data-modal");
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove("hidden");
                modal.classList.add("flex");
                document.body.style.overflow = "hidden"; // Disable scrolling
            }
        });
    });

    // Close modal when clicking the close button
    closeButtons.forEach((button) => {
        button.addEventListener("click", (event) => {
            event.stopPropagation(); // Prevent click from bubbling to modal
            const modalId = button.getAttribute("data-modal-id");
            closeModal(modalId);
        });
    });

    // Close modal when clicking outside
    modals.forEach((modal) => {
        modal.addEventListener("click", (event) => {
            if (event.target === modal) {
                closeModal(modal.id);
            }
        });
    });

    // Close modal when pressing Escape key
    document.addEventListener("keydown", (event) => {
        if (event.key === "Escape") {
            modals.forEach((modal) => {
                if (!modal.classList.contains("hidden")) {
                    closeModal(modal.id);
                }
            });
        }
    });

    // Share link functionality
    document.querySelectorAll(".share-link").forEach((button) => {
        button.addEventListener("click", () => {
            const url = button.getAttribute("data-url");
            navigator.clipboard.writeText(url).then(() => {
                alert("Tautan telah disalin ke clipboard!");
            }).catch((err) => {
                console.error("Gagal menyalin tautan:", err);
            });
        });
    });

    const form = document.getElementById('contact-form');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            submitBtn.disabled = true;
            submitBtn.textContent = 'Mengirim...';

            // Remove previous feedback
            const prevMsg = document.getElementById('form-message-ajax');
            if (prevMsg) prevMsg.remove();

            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': form.querySelector('input[name=_token]').value,
                },
                body: formData
            })
            .then(async res => {
                const contentType = res.headers.get('content-type');
                let data;
                if (contentType && contentType.includes('application/json')) {
                    data = await res.json();
                } else {
                    data = { html: await res.text() };
                }
                return { ok: res.ok, status: res.status, data };
            })
            .then(({ok, status, data}) => {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Kirim Pesan';
                // Success (login user)
                if (ok && data.success) {
                    form.reset();
                    showAjaxMessage(data.success, 'success');
                } else if (data.must_login) {
                    showAjaxMessage(data.must_login, 'warning');
                } else if (data.errors) {
                    // Laravel validation errors
                    let msg = Object.values(data.errors).map(arr => arr.join('<br>')).join('<br>');
                    showAjaxMessage(msg, 'danger');
                } else {
                    showAjaxMessage('Terjadi kesalahan. Silakan coba lagi.', 'danger');
                }
            })
            .catch(() => {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Kirim Pesan';
                showAjaxMessage('Terjadi kesalahan jaringan.', 'danger');
            });
        });
    }

    function showAjaxMessage(msg, type) {
        const color = type === 'success' ? 'green' : (type === 'warning' ? 'yellow' : 'red');
        const el = document.createElement('div');
        el.id = 'form-message-ajax';
        el.className = `mt-4 text-center p-3 bg-${color}-100 text-${color}-800 rounded-lg`;
        el.innerHTML = msg;
        form.parentNode.insertBefore(el, form.nextSibling);
    }
});