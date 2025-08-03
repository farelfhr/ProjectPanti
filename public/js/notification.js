let notificationTimeout;

/**
 * Menampilkan notifikasi pop-up.
 * @param {string} message
 * @param {string} type 
 */

export function showNotification(message, type = "success") {
    const popup = document.getElementById("notification-popup");
    const messageElement = document.getElementById("notification-message");

    if (!popup || !messageElement) return;

    clearTimeout(notificationTimeout);

    messageElement.textContent = message;
    if (type === "success") {
        popup.classList.remove("bg-red-500");
        popup.classList.add("bg-green-500");
    } else {
        popup.classList.remove("bg-green-500");
        popup.classList.add("bg-red-500");
    }

    popup.classList.remove("translate-x-full");

    notificationTimeout = setTimeout(() => {
        popup.classList.add("translate-x-full");
    }, 3000);
}
