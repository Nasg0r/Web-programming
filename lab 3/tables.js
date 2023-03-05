const table = document.createElement('table');
let rows = 0;
function creator() {
    if (document.getElementById('table'))
        alert ("Таблица уже существует");
    else {
        table.innerHTML = "<table><tr><td><b>№</b></td><td><b>ФИО</b></td><td><b>Баллы</b></td><td><b>Итоговая оценка</b></td></tr></table>";
        table.setAttribute('id', 'table');
        document.body.append(table);
        rows += 1;
    }
}

function add() {
    let row = table.insertRow();
    row.insertCell().append(rows);
    row.insertCell().append("ФИО");
    row.insertCell().append("Количество баллов");
    row.insertCell().append("Оценка");
    rows++;
}

function del() {
    if (document.getElementById('row').value==="") 
        alert("Введите номер строки");
    else {
        let del_row = document.getElementById('row').value;
        try {
            table.deleteRow(del_row);
            alert("Строка удалена");
        }
        catch {
            alert("Неправильный номер");
        }
    }
}