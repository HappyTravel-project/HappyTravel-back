import Image from 'next/image';
import React from 'react';

const Logo = () => {
    return (
        <div>
            <Image 
                src='/Assets/Logo.svg' alt="Logo"
                width={125}
                height={58}
                
            />

        </div>
    );
};

export default Logo;
