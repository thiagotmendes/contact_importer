// import IMask from 'imask';

require('./bootstrap');

// var dispatchMask = IMask('.phone', {
//         mask: [
//             {
//                 mask: '+00 {21} 0 000 0000',
//                 startsWith: '30',
//                 lazy: false,
//                 country: 'Greece'
//             },
//             {
//                 mask: '+0 000 000-00-00',
//                 startsWith: '7',
//                 lazy: false,
//                 country: 'Russia'
//             },
//             {
//                 mask: '+00-0000-000000',
//                 startsWith: '91',
//                 lazy: false,
//                 country: 'India'
//             },
//             {
//                 mask: '0000000000000',
//                 startsWith: '',
//                 country: 'unknown'
//             }
//         ],
//         dispatch: function (appended, dynamicMasked) {
//             var number = (dynamicMasked.value + appended).replace(/\D/g,'');
//
//             return dynamicMasked.compiledMasks.find(function (m) {
//                 return number.indexOf(m.startsWith) === 0;
//             });
//         }
//     }
// )
