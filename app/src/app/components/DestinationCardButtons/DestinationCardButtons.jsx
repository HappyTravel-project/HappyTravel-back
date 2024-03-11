"use client";

import Image from 'next/image';

export const EditButton = () => (
  <div className="cursor-pointer">
    <Image
      src="/assets/edit-icon.svg"
      width={24}
      height={24}
    />
  </div>
);

export const DeleteButton = () => (
  <div className="cursor-pointer">
    <Image
      src="/Assets/Delete-icon.svg"
      alt="Eliminar"
      width={24}
      height={24}
    />
  </div>
);