import React from 'react';
import Link from 'next/link';

const NavBarLoggedMob = () => {
    return (
        <nav>
            <ul className="fixed bottom-0 left-1/2 transform -translate-x-1/2  w-[350px] h-[62px] bg-yellow-100 rounded-[40px] shadow-[inset_0px_2px_2px_#00dfa240 flex items-center space-x-2 ml-2 ">

                <div className="w-[50px] h-[40px] top=[11px] left-[33px] ">

                </div>
                <div className=" display flex space-x-16 items-center ">
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
                        <Link href="/login">
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
                                className="Logout-icon w-[40px] h-[40px] "
                            />


                        </Link>
                    </li>
                </div>
            </ul>

        </nav >
    );
};

export default NavBarLoggedMob;