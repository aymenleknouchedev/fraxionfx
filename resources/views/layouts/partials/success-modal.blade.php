<!-- Success Modal Component -->
@if (session('success'))
    <div id="successModal" style="
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
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
            <div style="font-size: 3rem; color: #4caf50; margin-bottom: 1rem;">
                <i class="fas fa-check-circle"></i>
            </div>
            <h2 style="color: var(--blue); margin-bottom: 0.5rem; font-size: 1.5rem;">
                Success!
            </h2>
            <p style="color: #666; margin-bottom: 2rem; font-size: 1.1rem;">
                {{ session('success') }}
            </p>
            <button onclick="closeSuccessModal()" style="
                background: var(--orange);
                color: white;
                padding: 0.75rem 2rem;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 1rem;
                font-weight: bold;
                transition: background 0.3s;
            ">
                <i class="fas fa-check"></i> Got It
            </button>
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
        // Close success modal
        function closeSuccessModal() {
            const modal = document.getElementById('successModal');
            if (modal) {
                modal.style.opacity = '0';
                modal.style.transition = 'opacity 0.3s ease-out';
                setTimeout(() => {
                    modal.style.display = 'none';
                }, 300);
            }
        }

        // Auto-close modal after 5 seconds
        const successModal = document.getElementById('successModal');
        if (successModal) {
            setTimeout(() => {
                closeSuccessModal();
            }, 5000);
        }
    </script>
@endif
