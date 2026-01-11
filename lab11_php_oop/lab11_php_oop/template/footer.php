</main> </div> <footer class="footer-modern">
        <div class="footer-content">
            <p>&copy; 2025 - <strong>Universitas Pelita Bangsa</strong>. All rights reserved.</p>
            <div class="footer-subtext">
                <span>Pemrograman Web</span>
                <span class="divider">|</span>
                <span>Teknik Informatika</span>
            </div>
        </div>
    </footer>

    <style>
        /* Memaksa footer ke bawah */
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            flex: 1 0 auto; /* Memberikan ruang dorong ke footer */
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            display: flex;
            gap: 20px;
            padding: 20px;
        }

        .footer-modern {
            flex-shrink: 0;
            background-color: #2c3e50;
            color: #ffffff;
            padding: 25px 0;
            border-top: 4px solid #3498db;
            text-align: center;
        }

        .footer-content p {
            margin: 0;
            font-size: 14px;
        }

        .footer-subtext {
            font-size: 12px;
            color: #bdc3c7;
            margin-top: 5px;
        }

        .divider { margin: 0 8px; color: #7f8c8d; }
    </style>
</body>
</html>