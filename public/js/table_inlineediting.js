// document.addEventListener('DOMContentLoaded', function () {
//     // Your code here
//     const form = document.getElementById("inlineform");
//     form.addEventListener('submit', (e) => {
//         e.preventDefault()
//         const crsfToken = e.target.children[0].value;
//         const input = e.target.children[1];
//         const foreignKey = Number(input.dataset.foreignKey);
//         const tableName = input.dataset.tableName
//         const value = input.value;

//         let ajax = new XMLHttpRequest();
//         try {
//             ajax.open("PATCH", `/stockchange/${foreignKey}`, true)
//             ajax.setRequestHeader('X-CSRF-TOKEN', crsfToken);
//             ajax.setRequestHeader('Content-Type', 'application/json');
//             ajax.onreadystatechange = function () {
//                 if (this.readyState == 4 && this.status == 200) {
//                     const res = JSON.parse(this.response)
//                     console.log(res);
//                 }
//             }
//             // Sending our request
//             const data = {
//                 "id": foreignKey,
//                 "stock": Number(value),
//                 "table": tableName
//             }

//             ajax.send(data);
//         } catch (err) {
//             console.log(err)
//         }
//     })
// });

