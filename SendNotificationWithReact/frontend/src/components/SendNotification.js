import React, { useState, useEffect } from 'react';
import Echo from "laravel-echo";
import axios from 'axios';
import Pusher from 'pusher-js'
const SendNotification = () => {
    const [message, setMessage] = useState([]);
    const [newMessage, setNewMessage] = useState([]);
    // const [name, setName] = useState("");
    const [formValue, setFormValue] = useState({
        name: '',
        sendMessage: ''
    });
    // const echo = new Echo({
    //     broadcaster: 'pusher',
    //     key: 'aaasaassa',
    //     cluster: 'mt1',
    //     // encrypted: true,
    // });
    // echo.channel(formValue.name)
    //     .listen('AllUserMessageEvent', (event) => {
    //         // setMessages([...messages, event.message]);
    //         console.log(event);
    //     });

    useEffect(() => {
        const echo = new Echo({
            broadcaster: 'pusher',
            key: 'aaasaassa',
            cluster: 'mt1',
            // useTLS: true,
            // host: 'http:://localhost:8000',
            // port: 6001,
            // scheme: 'http',
            encrypted: true,
            forceTLS: false,
            wsHost: window.location.hostname,
            wsPort: 6001,
            disableStats: true

        });

        echo.channel('allUserMessage.' + formValue.name)
            .listen('AllUserMessageEvent', (event) => {
                setMessage([...message, event.data]);
                console.log(event.data);
            });
        // console.log(message);
    }, [message]);
    const handleValue = (e) => {
        setFormValue({
            ...formValue,
            [e.target.name]: e.target.value
        });
    }
    const sendNotification = async () => {

        await axios.post('http://localhost:8000/api/send-notification', formValue).then((response) => {
            console.log(response.data.message);
        });
        console.log(window.location.hostname)


    }
    return (
        <>
            <div>
                {
                    message.map((mes, index) => (
                        <p key={index}>{mes}</p>
                    ))
                }
            </div>
            <div>
                <input type="text" name='name' value={formValue.name} onChange={handleValue} />
                <input type='text' name='sendMessage' value={formValue.sendMessage} onChange={handleValue} />
                <button onClick={sendNotification}>Send</button>
            </div>
        </>
    )
}
export default SendNotification;