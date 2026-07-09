import axios from "axios";
import { APP_CONFIG } from "@/config/app";

export const api = axios.create({
    baseURL: APP_CONFIG.apiUrl,

    timeout: 10000,

    withCredentials: true,

    headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
    },
});