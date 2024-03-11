import React from 'react';
import Link from 'next/link';
import Image from 'next/image';

const NavBar = () => {
    return (
        <nav>
            <ul className="flex items-center space-x-4">
                <li>
                    <Link href="/">
                        <Image
                            src='/Assets/Home-icon.svg'
                            alt="Home icon"
                            width={40} height={40} 
                            className="Home-icon"
                        />
                    </Link>
                </li>
                <li>
                    <Link href="/register">
                        <Image
                            src='/Assets/Avatar-icon.svg'
                            alt="Avatar icon"
                            width={40} height={40} 
                            className="Avatar-icon"
                        />


                    </Link>
                </li>

            </ul>
        </nav>
    );
};

export default NavBar;
