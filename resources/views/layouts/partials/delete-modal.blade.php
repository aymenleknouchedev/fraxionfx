<!-- Delete Confirmation Modal Component -->
<div id="deleteModal" style="
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 1000;
">
    <div style="
        background: white;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        max-width: 500px;
        text-align: center;
        animation: slideIn 0.3s ease-out;
    ">
        <div style="font-size: 3rem; color: #ff6b6b; margin-bottom: 1rem;">
            <i class="fas fa-exclamation-circle"></i>
        </div>
        <h2 style="color: var(--blue); margin-bottom: 0.5rem; font-size: 1.5rem;">
            Confirm Delete
        </h2>
        <p style="color: #666; margin-bottom: 2rem; font-size: 1.1rem;">
            Are you sure you want to delete this item? This action cannot be undone.
        </p>
        <div style="display: flex; gap: 1rem; justify-content: center;">
            <button onclick="closeDeleteModal()" style="
                background: #ccc;
                color: #333;
                padding: 0.75rem 2rem;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 1rem;
                font-weight: bold;
                transition: background 0.3s;
            ">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button onclick="confirmDelete()" style="
                background: #ff6b6b;
                color: white;
                padding: 0.75rem 2rem;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 1rem;
                font-weight: bold;
                transition: background 0.3s;
            ">
                <i class="fas fa-trash"></i> Delete
            </button>
        </div>
    </div>
</div>

    <style>
        @keyframes slideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>

    <script>
        let deleteForm = null;

        function openDeleteModal(form) {
            deleteForm = form;
            document.getElementById('deleteModal').style.display = 'flex';
        }

        function closeDeleteModal() {
            deleteForm = null;
            document.getElementById('deleteModal').style.display = 'none';
        }

        function confirmDelete() {
            if (deleteForm) {
                deleteForm.submit();
            }
        }

        // Close modal when clicking outside
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });
    </script>
