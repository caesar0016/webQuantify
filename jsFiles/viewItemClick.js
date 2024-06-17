console.log("Hello WOrld");
isLeapYear = (year) =>{
    return (year % 4 === 0 && year % 100 !== 0 && year & 400 !==0)
    || (year % 100 === 0 && year % 400 === 0)
}

getFebDays = (year) => {
    return isLeapYear(year) ? 29 : 28
}

let calendar = document.querySelector('.calendar');

const month_names = [
    'January', 'February', 'March', 'April', 
    'May', 'June', 'July', 'August',
    'September', 'October', 'November', 'December']

let month_picker = document.querySelector('#month-picker')

const generateCalendar = (month, year) => {
    let calendar_days = document.querySelector('.calendar-days');
    calendar_days.innerHTML = '';

    let calendar_header_month = document.querySelector('#month-picker');
    let calendar_header_year = document.querySelector('#year');

    let days_of_month = [31, getFebDays(year), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

    calendar_header_month.textContent = month_names[month];
    calendar_header_year.textContent = year;

    let first_day = new Date(year, month - 1, 1); // month - 1 because months are zero-indexed

    for (let i = 0; i < days_of_month[month - 1] + first_day.getDay(); i++) {
        let day = document.createElement('div');
        
        if (i >= first_day.getDay()) {
            day.classList.add('calendar-day-hover');
            day.textContent = i - first_day.getDay() + 1;
            day.innerHTML += '<span></span><span></span><span></span><span></span>';
            
            const currDate = new Date();
            if (i - first_day.getDay() + 1 === currDate.getDate() && year === currDate.getFullYear() && month - 1 === currDate.getMonth()) {
                day.classList.add('curr-date');
            }
        }
        calendar_days.appendChild(day);
    }
};

let currDate = new Date()

let curr_month = {value: currDate.getMonth()}
let curr_year = {value: currDate.getFullYear()}

generateCalendar(curr_month.value, curr_year.value)