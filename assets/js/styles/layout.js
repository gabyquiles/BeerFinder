import React from 'react'
import styled from 'styled-components'

export const Layout = styled.div`
    height: 100vh;
    display: grid;
    grid-template-rows: [start] 100px [header_content] 1fr [end];
    grid-template-columns: 25% 25% 25% 25%;
    grid-template-areas: "header header header header" "sidebar  main main main";
`

export const Header = styled.header`
    background-color: aqua;
    grid-area: header;
`

export const Sidebar = styled.aside`
    grid-area: sidebar;
`

export const MainSection = styled.section`
    backbroud: aqua
    grid-area: main;
`