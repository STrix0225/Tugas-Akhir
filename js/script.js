document.addEventListener('DOMContentLoaded', () => {

    const themeToggleBtn = document.getElementById('btn-theme-toggle');
    const bodyElement = document.body;
    const savedTheme = localStorage.getItem('gymTheme');
    if (savedTheme === 'dark') {
        bodyElement.classList.add('dark-mode');
    }

    if (themeToggleBtn) {
        themeToggleBtn.addEventListener('click', (e) => {
            e.preventDefault();
            bodyElement.classList.toggle('dark-mode');

            if (bodyElement.classList.contains('dark-mode')) {
                localStorage.setItem('gymTheme', 'dark');
            } else {
                localStorage.setItem('gymTheme', 'light');
            }
        });
    }

    const wishlistButtons = document.querySelectorAll('.btn-wishlist');
    const badgeElement = document.getElementById('wishlist-badge');
    const btnBuyButtons = document.querySelectorAll('.btn-buy'); 

    const getWishlistData = () => {
        const data = sessionStorage.getItem('gymWishlist');
        return data ? JSON.parse(data) : [];
    };

    const saveWishlistData = (data) => {
        sessionStorage.setItem('gymWishlist', JSON.stringify(data));
    };

    const updateBadge = () => {
        const wishlist = getWishlistData();
        if (badgeElement) {
            badgeElement.innerText = wishlist.length;
        }
    };

    updateBadge();

    wishlistButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();

            const card = e.target.closest('.card-body');
            const itemName = card.querySelector('.item-name').innerText;
            const stockElement = card.querySelector('.stock-value');
            
            let currentStock = parseInt(stockElement.innerText);
            const wishlist = getWishlistData();

            if (wishlist.includes(itemName)) {
                alert(`${itemName} sudah ada di keranjang kamu.`);
            } else {
                if (currentStock > 0) {
                    currentStock--;
                    stockElement.innerText = currentStock;

                    wishlist.push(itemName);
                    saveWishlistData(wishlist);
                    updateBadge();
                    
                    alert(`${itemName} berhasil ditambahkan ke keranjang!`);
                } else {
                    alert(`Maaf, kuota promo untuk ${itemName} sudah habis!`);
                }
            }
        });
    });

    btnBuyButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const card = e.target.closest('.card-body');
            const itemName = card.querySelector('.item-name').innerText;
            alert(`Kamu akan diarahkan ke halaman pendaftaran untuk ${itemName}.`);
        });
    });

    const wishlistModalBody = document.getElementById('wishlist-modal-body');
    const btnClearWishlist = document.getElementById('btn-clear-wishlist');
    const btnOpenModal = document.getElementById('btn-open-modal');

    const renderModalWishlist = () => {
        const wishlist = getWishlistData();

        wishlistModalBody.innerHTML = ''; 

        if (wishlist.length === 0) {
            wishlistModalBody.innerText = 'Keranjang kamu masih kosong.';
            return;
        }

        wishlist.forEach((item, index) => {
            const itemRow = document.createElement('div');
            itemRow.className = 'd-flex justify-content-between align-items-center mb-3 border-bottom pb-2';

            const textSpan = document.createElement('span');
            textSpan.className = 'fw-semibold';
            textSpan.innerText = item;

            const removeBtn = document.createElement('button');
            removeBtn.className = 'btn btn-outline-danger btn-sm';
            removeBtn.innerText = 'Hapus';
            removeBtn.addEventListener('click', () => {
                removeSpecificItem(index);
            });

            itemRow.appendChild(textSpan);
            itemRow.appendChild(removeBtn);
            wishlistModalBody.appendChild(itemRow);
        });
    };

    const removeSpecificItem = (index) => {
        const wishlist = getWishlistData();
        wishlist.splice(index, 1);
        saveWishlistData(wishlist);
        updateBadge();
        renderModalWishlist();
    };

    if (btnOpenModal) {
        btnOpenModal.addEventListener('click', renderModalWishlist);
    }

    if (btnClearWishlist) {
        btnClearWishlist.addEventListener('click', () => {
            sessionStorage.removeItem('gymWishlist');
            updateBadge();
            renderModalWishlist();
        });
    }

});