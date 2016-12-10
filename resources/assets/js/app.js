import React from 'react';
import { render } from 'react-dom';
import Calendar from './components/Calendar';

if (document.getElementById('calendar')) {
    render(<Calendar />, document.getElementById('calendar'));
}