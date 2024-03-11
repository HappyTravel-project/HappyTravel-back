'use server'
import { cookies } from 'next/headers';

const encrypt = (data) => {
    const encryptedData = btoa(data); // Codificar en Base64
    return encryptedData;
};

const decrypt = (encryptedData) => {
    const decryptedData = atob(encryptedData); // Decodificar desde Base64
    return decryptedData;
};

export const setSessionCookie = (sessionData) => {
    const encryptedSessionData = encrypt(JSON.stringify(sessionData)); 
    cookies().set('authTokens', encryptedSessionData, {
        httpOnly: true,
        secure: process.env.NODE_ENV === 'production',
        maxAge: 60 * 60 * 24 * 7, 
        path: '/',
    });

};

export async function getSessionData(req) {
    const encryptedSessionData = cookies(req).get('authTokens')?.value;
    console.log(encryptedSessionData);
    return encryptedSessionData ? JSON.parse(decrypt(encryptedSessionData)) : null;
}

export const logout = (req) => {
    cookies(req).delete('authTokens')
};