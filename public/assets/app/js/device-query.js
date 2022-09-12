let devices = [];
let device_logs = [];

function fetchDevices(e) {
    e.preventDefault();
    fetch(e.target.getAttribute('action'), {
        method: 'post',
        body: new FormData(e.target)
    })
        .then(response => response.json())
        .then(response => {
            if (response.status == 'success') {
                devices = response.devices;
                device_logs = response.device_logs;
                renderTable();
                document.getElementById('device').classList.add('d-none');
                document.getElementById('device-list').classList.remove('d-none');
            } else if (response.status == 'error') {
                Swal.fire({
                    icon: 'error',
                    title: 'Hata',
                    text: response.value,
                });
            }
        });
}

function renderTable() {
    document.getElementById('devices-table-body').innerHTML = '';
    devices.forEach((device, index) => {
        let columns = [], viewBtn, tr;
        viewBtn = document.createElement('button');
        viewBtn.addEventListener('click', (e) => viewDevice(index, device.id));
        viewBtn.classList.add('btn', 'bg-black', 'text-white');
        viewBtn.innerText = 'Görüntüle';
        tr = document.createElement('tr');
        tr.classList.add('text-center');
        document.querySelectorAll('.devices-table-column').forEach(() => {
            let column = document.createElement('td');
            column.classList.add('align-middle');
            columns.push(column)
            tr.append(column);
        });
        columns[0].innerHTML = device.id;
        columns[1].innerHTML = device.device_type_value;
        columns[2].innerHTML = device.device_brand_value;
        columns[3].innerHTML = device.model;
        columns[4].innerHTML = showStatus(device.status);
        columns[5].innerHTML = device.created_at;
        columns[6].append(viewBtn);
        document.getElementById('devices-table-body').append(tr);
    });
}

function viewDevice(index, id) {
    document.getElementById('device').classList.remove('d-none');
    document.getElementById('device-table-body').innerHTML = '';
    document.getElementById('status').innerHTML = showStatus(devices[index].status);
    document.getElementById('device_info').innerHTML = `${devices[index].device_type_value} | ${devices[index].device_brand_value} | ${devices[index].model}`;
    document.getElementById('includes').innerHTML = devices[index].includes || '<span class="text-muted">Belirtilmedi</span>';
    document.getElementById('problems').innerHTML = devices[index].problems;
    document.getElementById('created_at').innerHTML = devices[index].created_at;
    device_logs[id].forEach(log => {
        let columns = [];
        tr = document.createElement('tr');
        tr.classList.add('text-center');
        document.querySelectorAll('.log-table-column').forEach(() => {
            let column = document.createElement('td');
            column.classList.add('align-middle');
            columns.push(column)
            tr.append(column);
        });
        columns[0].innerHTML = log.id;
        columns[1].innerHTML = log.action;
        columns[2].innerHTML = new Date(log.created_at).toLocaleString();
        document.getElementById('device-table-body').append(tr);
    });
}

function showStatus(status) {
    switch (status) {
        case 1:
            return `<span class="badge bg-secondary">SIRADA</span>`;
        case 2:
            return `<span class="badge bg-warning">DEVAM EDİYOR</span>`;
        case 3:
            return `<span class="badge bg-success">TAMAMLANDI</span>`;
        case 4:
            return `<span class="badge bg-primary">TESLİM EDİLDİ</span>`;
        case 5:
            return `<span class="badge bg-danger">İPTAL EDİLDİ</span>`;
        case 6:
            return `<span class="badge bg-danger">İADE EDİLDİ</span>`;
    }
}

document.getElementById('customer-form').addEventListener('submit', fetchDevices);