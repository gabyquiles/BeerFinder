import React from 'react'
import styled from 'styled-components'

export const BreweriesListSidebar = styled.div`
    display:flex;
    flex-direction: column;
    background: #F5F5F5;
    height: 100%;
    overflow: scroll;
`

export const BrewerySummary = styled.div`
    background: #FFF;
    padding: 12px 16px;
    margin: 8px 0 0 8px;
    box-shadow: 0 2px 4px rgba(0,0,0, 0.5)
`

export const BrewerySummaryName = styled.h3`
    color: rgba(0,0,0,.75);
`

export const StyledAddress = styled.div`
    color: #8C8C8C;
`

export const AddressLine = styled.p`
    color: #8C8C8C;
    margin: 8px auto;
`
export const DistanceLine = styled.p`
    color: #8C8C8C;
    margin: 8px auto;
`