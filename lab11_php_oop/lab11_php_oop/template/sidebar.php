<?php
?>
<aside>
    <div class="sidebar-box">
        <h4 class="sidebar-title">Navigation</h4>
        <ul class="sidebar-menu">
            <li>
                <a href="/lab11_php_oop/artikel/index" class="menu-item">
                    <i class="fa-regular fa-folder-open icon"></i>
                    <span class="text">Daftar Artikel</span>
                </a>
            </li>
            <li>
                <a href="/lab11_php_oop/artikel/tambah" class="menu-item">
                    <i class="fa-solid fa-circle-plus icon"></i>
                    <span class="text">Tambah Artikel</span>
                </a>
            </li>

            <li class="menu-divider"></li>

            <li>
                <a href="/lab11_php_oop/user/profile" class="menu-item disabled">
                    <i class="fa-regular fa-user icon"></i>
                    <span class="text">Profil Saya</span>
                </a>
            </li>
            <li>
                <a href="#" class="menu-item disabled">
                    <i class="fa-solid fa-gear icon"></i>
                    <span class="text">Pengaturan</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="sidebar-info">
        <p><i class="fa-solid fa-shield-halved"></i> <strong>Status:</strong> Administrator</p>
        <p><i class="fa-solid fa-flask"></i> <strong>Lab:</strong> Pemrograman Web</p>
    </div>
</aside>


<style>
    /* CSS Tambahan khusus Sidebar agar terlihat mewah */
    .sidebar-box {
        background: #ffffff;
        border-radius: 15px;
        overflow: hidden;
    }

    .sidebar-title {
        font-size: 12px;
        text-transform: uppercase;
        color: #95a5a6;
        letter-spacing: 1.5px;
        margin-bottom: 15px;
        padding: 0 10px;
    }

    .sidebar-menu {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .menu-item {
        display: flex;
        align-items: center;
        padding: 12px 15px;
        text-decoration: none;
        color: #2c3e50;
        font-weight: 500;
        transition: all 0.3s ease;
        border-radius: 10px;
        margin-bottom: 5px;
    }

    .menu-item:hover {
        background: #ebf5ff;
        color: #3498db;
        transform: translateX(5px);
    }

    .menu-item .icon {
        margin-right: 12px;
        font-size: 18px;
    }

    .menu-divider {
        height: 1px;
        background: #eee;
        margin: 15px 0;
    }

    .disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .sidebar-info {
        margin-top: 25px;
        padding: 15px;
        background: #2c3e50;
        color: white;
        border-radius: 12px;
        font-size: 13px;
    }

    .sidebar-info p {
        margin: 5px 0;
    }
</style>