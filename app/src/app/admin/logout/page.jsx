"use client";

import { useEffect } from "react";
import { useRouter } from "next/navigation";
import { logout } from "../../utils/sessionsUtils";

export default function Page() {
    const router = useRouter();

    useEffect(() => {
        logout();
        router.push("/");
    });

    return null;
}