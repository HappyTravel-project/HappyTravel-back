import React from 'react';
import Link from 'next/link';

const NavBarLogged = () => {
    return (
        <nav>
            <ul className="flex items-center space-x-4">
                <li>
                    <Link href="/home">
                        <img
                            src='./Assets/Home-icon.svg'
                            alt="Home icon"
                            className="Home-icon w-40px] h-[40px]"
                        />
                    </Link>
                </li>
                <li>
                    <Link href="/create">
                        <img
                            src='./Assets/Create-icon.svg'
                            alt="Create icon"
                            className="Create-icon w-[40px] h-[40px]"
                        />


                    </Link>
                </li>
                <li>
                    <Link href="/Logout">
                        <img
                            src='./Assets/Logout-icon.svg'
                            alt="Logout icon"
                            className="Logout-icon w-[40px] h-[40px]"
                        />


                    </Link>
                </li>

            </ul>
        </nav>
    );
};

export default NavBarLogged;
