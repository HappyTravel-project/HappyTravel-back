"use client";

import Image from "next/image";
import { useRouter } from "next/navigation";
import React, { useState } from "react";



const SearchComponent = () => {
    const [search, setSearch] = useState("");

    const router = useRouter()

    const handleSearch = (e) => {
        e.preventDefault(); 
        router.push(`/?query=${search}`); 
        setSearch('')
    }
    const handleChange = (e) => {
        setSearch(e.target.value);
        router.push(`/?query=${e.target.value}`);
    };

    return (
        <div
            className={`relative w-[200px] h-[35px] bg-yellow-100 rounded-[20px] shadow-[inset_0px_2px_2px_#00000040]`}
        >
            <form onSubmit={handleSearch}>

                <input
                type="text"
                placeholder="Search..."
                value={search}
                onChange={handleChange}
                className="absolute top-0 left-0 font-normal text-[#0079ff] text-[20px] tracking-[0] leading-normal whitespace-nowrap p-2 w-full h-full bg-yellow-100 rounded-[20px] shadow-[inset_0px_2px_2px_#00000040] outline-none placeholder-blue-500 text-left"
                />

                <Image
                    src="/Assets/Glass-icon.svg"
                    alt="Glass icon"
                    width={23}
                    height={18}
                    className="absolute top-[30%] transform [-translate-y] right-[16px]"
                
                />
            </form>
        </div>
    );
};

export default SearchComponent;
