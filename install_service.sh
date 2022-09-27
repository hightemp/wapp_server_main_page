#!/bin/bash

rm -f /etc/systemd/system/php_local_page_server.service

SERVICE=<<EOF
[Unit]
Description=php_local_page_server
Documentation=
After=network.target

[Service]
WorkingDirectory=$PWD
ExecStart=/bin/bash start_dev_server.sh
User=www-data
Group=www-data
KillMode=process
Restart=on-failure
RestartPreventExitStatus=255
Type=notify

[Install]
WantedBy=multi-user.target
Alias=php_local_page_server.service
EOF

echo "$SERVICE" > /etc/systemd/system/php_local_page_server.service

echo "[+] installed: php_local_page_server.service"
echo "[+] path: /etc/systemd/system/php_local_page_server.service"

systemctl start php_local_page_server.service
systemctl enable php_local_page_server.service
systemctl status php_local_page_server.service