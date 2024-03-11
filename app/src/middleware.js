'use server'
import { cookies } from 'next/headers';
import { NextResponse } from "next/server";

export function middleware(request) {
    const authTokens = cookies(request).get('authTokens')?.value;

    if (request.nextUrl.pathname.startsWith("/admin") && !authTokens) {
        return NextResponse.redirect(new URL("/login", request.url));
    }
    
    if (authTokens && request.nextUrl.pathname.startsWith("/login")) {
        return NextResponse.redirect(new URL("/admin/dashboard", request.url));
    }

    return null;
}
    
    export const config = {
        matcher: ["/admin/:path*", "/login"],
}

