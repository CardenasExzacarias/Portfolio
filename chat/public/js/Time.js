'use strict';

export class Time{
    hours;
    minutes;
    seconds;
    year;
    month;
    day;
    dateTime;

    constructor(){
        let time = new Date();
        this.hours = this._length(time.getHours());
        this.minutes = this._length(time.getMinutes());
        this.seconds = this._length(time.getSeconds());
        this.year = time.getFullYear();
        this.month = this._length(time.getMonth() + 1);
        this.day = this._length(time.getDate());
        this.dateTime = `${this.year}-${this.month}-${this.day} ${this.hours}:${this.minutes}:${this.seconds}`;
    }

    _length(num){
        num = num.toString();
        return (num.length < 2) ? (`0${num}`) : num;
    }
    
}