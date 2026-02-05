document.addEventListener("DOMContentLoaded", function() {
    fetch("fetch_donations.php")
        .then(response => response.json())
        .then(data => {
            let foodList = document.getElementById("food-list");
            data.forEach(donation => {
                let foodItem = document.createElement("div");
                foodItem.classList.add("food-item");
                foodItem.innerHTML = `
                    <p>Food: ${donation.food_name}</p>
                    <p>Quantity: ${donation.quantity}</p>
                    <p>Donor: ${donation.donor_name}</p>
                    <p><p>Donor: ${donation.donor_name}</p></p>
                    <button onclick="claimFood(${donation.id})">Claim</button>
                `;
                foodList.appendChild(foodItem);
            });
        });
});

function claimFood(id) {
    fetch(`claim_food.php?id=${id}`)
        .then(response => response.text())
        .then(message => {
            alert(message);
            location.reload();
        });
}

