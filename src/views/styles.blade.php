<style>
    body, html {
        font-size: 14px;
        font-family: Nunito, Helvetica, sans-serif;
        background-color: #fff;
        color: #444;
        font-weight: 100;
        height: 100vh;
    }

    body {
        padding: 2rem 0;
    }

    .loader-parent {
        position: absolute;
        z-index: 99;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.6);
    }

    .loader-parent .icon {
        font-size: 5em;
        color: white;
    }

    .error-message {
        margin-top: 1em;
    }

    form {
        position: relative;
    }

    .apm-switch {
        width: 70px;
        height: 34px;
        display: inline-block;
        border-radius: 34px;
        position: relative;
        background-color: #ddd;
        cursor: pointer;
        vertical-align: middle;
    }

    .apm-switch-inner {
        display: inline-block;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background-color: #fff;
        position: absolute;
        left: 5px;
        top: 5px;
        transition: .1s;
    }

    .apm-switch.apm-checked .apm-switch-inner {
        right: 5px;
        transform: translateX(36px);
    }

    .apm-switch.apm-checked {
        background-color: #444;
    }

    .apm-switch-inline .apm-switch {
        width: 2em;
        height: 1em;
    }

    .apm-switch-inline .apm-switch-inner {
        width: calc(1em - 10px);
        height: calc(1em - 10px);
    }

    .apm-switch-inline .apm-checked .apm-switch-inner {
        transform: translateX(1em);
    }

    .apm-switch-parent {
        width: 100%;
        display: flex;
        align-items: center;
    }

    .apm-switch-label {
        flex-grow: 1;
    }

    .add-button, .remove-button {
        font-size: 34px;
        display: inline-block;
        cursor: pointer;
        color: green;
        line-height: 1;
    }

    .remove-button {
        color: darkred;
    }

    .remove-button:hover {
        color: maroon;
    }

    .add-button:hover {
        color: darkgreen;
    }

</style>
