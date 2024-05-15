document.addEventListener("DOMContentLoaded", function() {
    fetch("orders.php")
        .then(response => response.json())
        .then(data => {
            const orderList = document.getElementById("order-list");
            if (data.length > 0) {
                const ul = document.createElement("ul");
                data.forEach(order => {
                    const li = document.createElement("li");
                    li.textContent = `${order.product_name}: ${order.price} TL`;
                    ul.appendChild(li);
                });
                orderList.appendChild(ul);
            } else {
                orderList.textContent = "Henüz siparişiniz bulunmamaktadır.";
            }
        })
        .catch(error => console.error("Sipariş bilgileri alınırken bir hata oluştu:", error));
});
