<style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
        font-family: 'Segoe UI', sans-serif;
        background: #f0f2f5;
        color: #333;
    }

    .navbar {
        background: #1a1a2e;
        padding: 15px 30px;
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .navbar a {
        color: #e0e0e0;
        text-decoration: none;
        font-size: 14px;
        padding: 8px 14px;
        border-radius: 6px;
        transition: background 0.2s;
    }

    .navbar a:hover { background: #16213e; }
    .navbar .brand { font-size: 18px; font-weight: 700; color: white; margin-right: auto; }

    .container {
        max-width: 1100px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
    }

    .page-header h1 { font-size: 26px; font-weight: 700; }

    .btn {
        padding: 9px 18px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
        transition: opacity 0.2s;
    }

    .btn:hover { opacity: 0.85; }
    .btn-primary { background: #4f46e5; color: white; }
    .btn-danger  { background: #ef4444; color: white; }
    .btn-success { background: #22c55e; color: white; }
    .btn-warning { background: #f59e0b; color: white; }
    .btn-ghost   { background: none; border: 1px solid #ccc; color: #555; }

    .card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        overflow: hidden;
    }

    table { width: 100%; border-collapse: collapse; }
    thead { background: #f8f8fb; }
    th { padding: 14px 16px; text-align: left; font-size: 13px; color: #888; text-transform: uppercase; letter-spacing: 0.5px; }
    td { padding: 14px 16px; border-top: 1px solid #f0f0f0; font-size: 14px; }
    tr:hover td { background: #fafafa; }

    .badge {
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .badge-paid    { background: #dcfce7; color: #16a34a; }
    .badge-unpaid  { background: #fee2e2; color: #dc2626; }
    .badge-pending    { background: #fef9c3; color: #ca8a04; }
    .badge-completed  { background: #dcfce7; color: #16a34a; }
    .badge-cancelled  { background: #fee2e2; color: #dc2626; }

    .alert {
        padding: 12px 16px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 14px;
        font-weight: 500;
    }

    .alert-success { background: #dcfce7; color: #16a34a; }
    .alert-danger  { background: #fee2e2; color: #dc2626; }

    .form-card {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        max-width: 600px;
    }

    .form-group { margin-bottom: 18px; }
    .form-group label { display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #555; }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 14px;
        outline: none;
        transition: border 0.2s;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus { border-color: #4f46e5; }

    .item-row {
        background: #f8f8fb;
        border-radius: 8px;
        padding: 16px;
        margin-bottom: 12px;
        display: grid;
        grid-template-columns: 1fr 1fr auto;
        gap: 12px;
        align-items: end;
    }

    .form-actions { display: flex; gap: 12px; margin-top: 24px; }

    .empty-state { text-align: center; padding: 60px; color: #aaa; font-size: 15px; }
</style>