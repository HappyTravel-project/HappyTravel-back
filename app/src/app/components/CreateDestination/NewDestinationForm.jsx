"use client";
import { useState } from "react";
import Button from "@/app/components/Button/Button";
import { useRouter } from "next/navigation";



const NewDestinationForm = () => {
    const route = useRouter()
    const [formData, setFormData] = useState({
        title: '',
        location: '',
        image: null,
        description: '',
    });

    const [loading, setLoading] = useState(false);
    const [error, setError] = useState(null);

    const handleChange = (e) => {
        const { name, value, files } = e.target;
        if (name === "image" && files.length > 0) {
            const selectedFile = files[0];
            setFormData({
                ...formData,
                [name]: selectedFile,
            });
            
        } else {
            setFormData({
                ...formData,
                [name]: value,
            });
        }
        
    };

    const handleClickDirection = () => {
        route.replace('/')
    }
    const handleSubmit = async (e) => {
        e.preventDefault();
        
        try {
            setLoading(true); 
            setError(null); 

            const responseData = await createDestination(formData);

        } catch (error) {
            setError(error.message || "Hubo un error al crear el destino");
        } finally {
            setLoading(false); 
        }
    };

    return (
        <div className="w-full sm:w-72 sm:h-9/11 lg:w-96 lg:h-9/11 xl:w-full xl:h-9/11 bg-white border-4 rounded-3xl border-yellow-100 p-5">
            <h1 className="text-center text-4xl text-pink-500">Crear destino</h1>
            <form method="post" onSubmit={handleSubmit} className="flex flex-row items-center justify-center bg-white h-full rounded-b-xl pr-1 border-t-2 border-pink-500">
                <div className="bg-white h-full w-1/2 pt-6 ml-2">
                    <div className="mr-7">
                        <label
                            htmlFor="small-input"
                            className="block mb-2 text-xl text-blue-500 dark:text-white font-semibold font-jaldi"
                        >
                            Título
                        </label>
                        <input
                            type="text"
                            name="title"
                            value={formData.title} 
                            onChange={handleChange} 
                            required
                            id="small-input"
                            className="block w-full p-1.5 rounded-full bg-yellow-100 text-xs input-height shadow-[inset_0px_4px_4px_#00000040] placeholder:text-blue-500 placeholder:text-lg placeholder:font-light"
                            placeholder="Escribe tu nombre..."
                            style={{ paddingTop: '15px',paddingLeft:'20px' }}
                        />

                        <label
                            htmlFor="small-input-2"
                            className="block mb-2 text-xl font-semibold text-blue-500 dark:text-white mt-2 font-jaldi"
                        >
                            Ubicación
                        </label>
                        <input
                            type="text"
                            name="location"
                            value={formData.location} 
                            onChange={handleChange} 
                            required
                            id="small-input-2"
                            className="block w-full p-1.5 rounded-full bg-yellow-100 text-xs input-height shadow-[inset_0px_4px_4px_#00000040] placeholder:text-blue-500 placeholder:text-lg placeholder:font-light"
                            placeholder="Escribe tu nombre..."
                            style={{ paddingTop: '15px',paddingLeft:'20px' }}
                        />
                        <label
                            htmlFor="small-input-2"
                            className="block pt-3 text-xl font-semibold text-blue-500 dark:text-white font-jaldi">
                            Imagen
                        </label>
                        <div className="relative inline-block h-auto w-full ">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                className="absolute top-1/2 left-0 transform translate-y-[-1.3rem] fill-current text-white text-center text-xl bg-blue-600 rounded-l-full pl-2.5 pt-2 h-10 shadow-r-lg"
                                width="20%"
                                height="94%"
                                viewBox="0 0 24 24" 
                                strokeWidth="1.6" 
                                stroke="#fff"
                                fill="none"
                                strokeLinecap="round"
                                strokeLinejoin="round"
                            >
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path transform="scale(1.1) translate(-3, -4)" d="M5 4h4l3 3h7a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2" />
                            </svg>
                            <input
                                id=""
                                type="file"
                                name="image"
                                
                                onChange={handleChange} 
                                required
                                className="bg-yellow-100 w-full h-10 rounded-full text-transparent p-0 shadow-[inset_0px_4px_4px_#00000040]"
                            />
                        </div>

                        <div className="flex flex-row mt-8 gap-1">
                            {/* <Button type="submit" text="Aceptar" isPrimary={true} /> */}
                            <button className="text-bg-color bg-primary px-8 py-1 rounded-full cursor-pointer text-xl hover:bg-opacity-80 transition-colors duration-300 flex" >Aceptar</button>
                            <button className="text-bg-color bg-secondary px-8 py-1 rounded-full cursor-pointer text-xl hover:bg-opacity-80 transition-colors duration-300 flex" onClick={handleClickDirection}>Cancelar</button>
                        </div>
                    </div>
                </div>
                <div className="w-1/2 bg-white h-96 p-2 rounded-xl">
                    <label
                        htmlFor="message"
                        className="block my-2 text-xl font-semibold font-jaldi text-blue-500 dark:text-white m-1.5 mt-3.5"
                    >
                        ¿Por qué quieres viajar allí?
                    </label>
                    <textarea
                        id="message"
                        name="description"
                        value={formData.description} 
                        onChange={handleChange} 
                        required
                        rows="3"
                        className="pt-2 pl-4 my-6 mt-1 h-80 w-full text-sm text-text-color bg-yellow-100 rounded-3xl shadow-[inset_0px_4px_4px_#00000040] textarea-height font-jaldi placeholder:text-blue-500 placeholder:text-lg placeholder:font-light"
                        placeholder="Escribe tu nombre..."
                    ></textarea>
                </div>
            </form>
        </div>
    );
};

export default NewDestinationForm;
