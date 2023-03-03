<?php
    // SQL Files
        // MySQL database connection parameters
        $db_connect = array(
            'SERVER-IP' => 'app-template_db-server_1',
            'PORT' => '3306',
            'USER' => 'root',
            'PASSWORD' => 'IaMgR0oT!az',
            'DATABASE' => 'app_db'
        );
        // SQL FILES
        $sql_functions_filelist = array(
            "sql_connection", // DB Sever Connection functions
            "sql_tools", // Useful tools
            "sql_setup_db", // Build the db defaults 
            "sql_users", // Auth system for accessing app
            "sql_user_details", // Auth User Details Key = Value
            "sql_jobs", // Track Projects by Job Number
            "sql_job_details", // You guessed it details about the job
            "sql_notes",
            "sql_files",
            "sql_file_details",
            "sql_customers",
            "sql_customer_contacts",
            "sql_customer_details",
            "sql_employees",
            "sql_employee_details",
            "sql_employee_contacts",
            "sql_suppliers",
            "sql_supplier_details",
            "sql_supplier_contacts",
            "sql_sub_contractors",
            "sql_sub_contractor_details",
            "sql_sub_contractor_contacts",
            "sql_banks",
            "sql_bank_details",
            "sql_bank_contacts",
            "sql_bank_transactions",
            "sql_inventory",
            "sql_pricing",
            "sql_price_details",
            "sql_bids",
            "sql_bid_items",
            "sql_expense_categories",
            "sql_expenses",
            "sql_payroll",
            "sql_hours",
            "sql_schedules",
            "sql_job_progression",
            "sql_tax_rates",
            "sql_invoicing_items",
            "sql_invoicing",
            "sql_admin_display_db",
            "sql_add_forms"
        );


    // Core
        // App Functions
        $app_functions_filelist = array(
            'app_core',
            'app_settings',
            'app_tools',
            'app_current_user'
        );

    // Default Theme Files

    // User
    $user = array();